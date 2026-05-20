const money = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'USD',
});

const productCards = Array.from(document.querySelectorAll('[data-product-card]'));
const searchInput = document.querySelector('#catalog-search');
const categoryButtons = Array.from(document.querySelectorAll('[data-category-filter]'));
const sortSelect = document.querySelector('[data-sort-select]');
const productsGrid = document.querySelector('[data-products-grid]');
const emptyState = document.querySelector('[data-empty-state]');
const productsSummary = document.querySelector('[data-products-summary]');
const visibleProductsCount = document.querySelector('[data-visible-products-count]');
const matchedProductsCount = document.querySelector('[data-matched-products-count]');
const showMorePanel = document.querySelector('[data-show-more-panel]');
const showMoreButton = document.querySelector('[data-show-more-products]');
const showMoreNote = document.querySelector('[data-show-more-note]');
const initialCartScript = document.querySelector('[data-initial-cart]');
const cartItemsTarget = document.querySelector('[data-cart-items]');
const clearCartButton = document.querySelector('[data-clear-cart]');
const pageSize = Number(productsGrid?.dataset.pageSize || 24);

let activeCategory = 'all';
let visibleLimit = pageSize;
const cart = new Map();

const parseInitialCart = () => {
    if (!initialCartScript) {
        return [];
    }

    try {
        return JSON.parse(initialCartScript.textContent.trim());
    } catch {
        return [];
    }
};

const addToCart = (item) => {
    const existing = cart.get(item.id);

    cart.set(item.id, {
        ...item,
        quantity: existing ? existing.quantity + 1 : item.quantity || 1,
    });

    renderCart();
};

const removeFromCart = (id) => {
    cart.delete(String(id));
    renderCart();
};

const setCartQuantity = (id, direction) => {
    const item = cart.get(String(id));

    if (!item) {
        return;
    }

    const nextQuantity = item.quantity + direction;

    if (nextQuantity <= 0) {
        removeFromCart(id);
        return;
    }

    cart.set(String(id), {
        ...item,
        quantity: nextQuantity,
    });

    renderCart();
};

const renderCart = () => {
    const items = Array.from(cart.values());
    const subtotal = items.reduce((total, item) => total + item.price * item.quantity, 0);
    const tax = subtotal * 0.05;
    const shipping = subtotal === 0 || subtotal > 500 ? 0 : 25;
    const total = subtotal + tax + shipping;
    const count = items.reduce((total, item) => total + item.quantity, 0);

    document.querySelectorAll('[data-cart-count]').forEach((target) => {
        target.textContent = count;
    });

    const subtotalTarget = document.querySelector('[data-cart-subtotal]');
    const taxTarget = document.querySelector('[data-cart-tax]');
    const shippingTarget = document.querySelector('[data-cart-shipping]');
    const totalTarget = document.querySelector('[data-cart-total]');

    if (subtotalTarget) {
        subtotalTarget.textContent = money.format(subtotal);
    }

    if (taxTarget) {
        taxTarget.textContent = money.format(tax);
    }

    if (shippingTarget) {
        shippingTarget.textContent = shipping === 0 ? 'Free' : money.format(shipping);
    }

    if (totalTarget) {
        totalTarget.textContent = money.format(total);
    }

    if (!cartItemsTarget) {
        return;
    }

    if (items.length === 0) {
        cartItemsTarget.innerHTML = '<div class="rounded-lg border border-dashed border-slate-300 p-4 text-sm font-semibold text-slate-500">Cart is empty</div>';
        return;
    }

    cartItemsTarget.innerHTML = items.map((item) => `
        <div class="flex gap-3 rounded-lg border border-slate-200 p-3">
            <div class="product-visual ${item.theme} h-16 w-16 shrink-0">
                <div class="product-object is-cart-object !h-10 !w-10 !text-[10px]">
                    <span class="!px-0 !text-[8px]">${item.label}</span>
                </div>
            </div>
            <div class="min-w-0 flex-1">
                <p class="truncate text-sm font-bold text-slate-950">${item.name}</p>
                <p class="text-xs font-semibold text-slate-500">${item.brand}</p>
                <div class="mt-2 flex items-center justify-between">
                    <p class="text-sm font-bold tabular-nums text-slate-950">${money.format(item.price)}</p>
                    <div class="flex items-center rounded-lg border border-slate-200">
                        <button type="button" class="px-2 py-1 text-sm font-bold text-slate-500" data-cart-dec="${item.id}" aria-label="Decrease ${item.name}">-</button>
                        <span class="min-w-7 text-center text-sm font-bold">${item.quantity}</span>
                        <button type="button" class="px-2 py-1 text-sm font-bold text-slate-500" data-cart-inc="${item.id}" aria-label="Increase ${item.name}">+</button>
                    </div>
                </div>
            </div>
        </div>
    `).join('');
};

const applyFilters = () => {
    const query = (searchInput?.value || '').trim().toLowerCase();
    let matchedCards = productCards.filter((card) => {
        const matchesCategory = activeCategory === 'all' || card.dataset.category === activeCategory;
        const matchesSearch = !query || card.dataset.name.includes(query);

        return matchesCategory && matchesSearch;
    });

    const sortMode = sortSelect?.value || 'featured';

    matchedCards = matchedCards.sort((a, b) => {
        if (sortMode === 'price-asc') {
            return Number(a.dataset.price) - Number(b.dataset.price);
        }

        if (sortMode === 'price-desc') {
            return Number(b.dataset.price) - Number(a.dataset.price);
        }

        if (sortMode === 'rating-desc') {
            return Number(b.dataset.rating) - Number(a.dataset.rating);
        }

        if (sortMode === 'stock-desc') {
            return Number(b.dataset.stock) - Number(a.dataset.stock);
        }

        return Number(b.dataset.featured) - Number(a.dataset.featured);
    });

    const visibleCards = matchedCards.slice(0, visibleLimit);

    productCards.forEach((card) => {
        card.hidden = true;
    });

    visibleCards.forEach((card) => productsGrid?.appendChild(card));

    visibleCards.forEach((card) => {
        card.hidden = false;
    });

    if (emptyState) {
        emptyState.classList.toggle('hidden', visibleCards.length > 0);
    }

    if (visibleProductsCount) {
        visibleProductsCount.textContent = visibleCards.length;
    }

    if (matchedProductsCount) {
        matchedProductsCount.textContent = matchedCards.length;
    }

    if (productsSummary) {
        productsSummary.classList.toggle('text-slate-600', matchedCards.length > 0);
        productsSummary.classList.toggle('text-amber-700', matchedCards.length === 0);
    }

    const remainingCount = matchedCards.length - visibleCards.length;

    if (showMorePanel) {
        showMorePanel.hidden = remainingCount <= 0;
    }

    if (showMoreButton) {
        const nextCount = Math.min(pageSize, remainingCount);
        showMoreButton.textContent = `Show ${nextCount} more ${nextCount === 1 ? 'product' : 'products'}`;
    }

    if (showMoreNote) {
        showMoreNote.textContent = `${remainingCount} ${remainingCount === 1 ? 'product is' : 'products are'} still hidden in this view.`;
    }
};

categoryButtons.forEach((button) => {
    button.addEventListener('click', () => {
        activeCategory = button.dataset.categoryFilter;

        categoryButtons.forEach((categoryButton) => {
            categoryButton.classList.toggle('is-active', categoryButton === button);
        });

        visibleLimit = pageSize;
        applyFilters();
    });
});

searchInput?.addEventListener('input', () => {
    visibleLimit = pageSize;
    applyFilters();
});

sortSelect?.addEventListener('change', () => {
    visibleLimit = pageSize;
    applyFilters();
});

showMoreButton?.addEventListener('click', () => {
    visibleLimit += pageSize;
    applyFilters();
});

document.querySelectorAll('[data-add-to-cart]').forEach((button) => {
    button.addEventListener('click', () => {
        addToCart({
            id: String(button.dataset.id),
            name: button.dataset.name,
            brand: button.dataset.brand,
            price: Number(button.dataset.price),
            theme: button.dataset.theme,
            label: button.dataset.label,
            quantity: 1,
        });
    });
});

cartItemsTarget?.addEventListener('click', (event) => {
    const decreaseButton = event.target.closest('[data-cart-dec]');
    const increaseButton = event.target.closest('[data-cart-inc]');

    if (decreaseButton) {
        setCartQuantity(decreaseButton.dataset.cartDec, -1);
    }

    if (increaseButton) {
        setCartQuantity(increaseButton.dataset.cartInc, 1);
    }
});

clearCartButton?.addEventListener('click', () => {
    cart.clear();
    renderCart();
});

parseInitialCart().forEach((item) => addToCart({
    ...item,
    id: String(item.id),
    price: Number(item.price),
    quantity: Number(item.quantity || 1),
}));

applyFilters();
renderCart();

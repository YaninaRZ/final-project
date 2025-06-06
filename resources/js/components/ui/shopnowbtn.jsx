export default function ShopNowButton() {
    return (
      <div className="text-sm leading-snug text-center max-w-[305px] text-stone-600 mx-auto mt-4">
        <button
          className="px-16 py-3.5 w-full rounded-md border border-solid bg-stone-200 border-stone-300"
          aria-label="Shop now"
          type="button"
        >
          Shop now
        </button>
      </div>
    );
  }
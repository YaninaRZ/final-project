export default function Button({ text, onClick }) {
    return (
        <>
            <button
                type="button"
                className="rounded-sm   px-2 py-1 text-xs font-semibold text-white shadow-xs hover: bg-[#68513F] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-bg-[#68513F]"
                onClick={onClick}
            >
                {text}
            </button>
        </>
    );
}

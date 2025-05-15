import React from "react";

interface QuantitySelectorProps {
  quantity: number;
  onIncrease: () => void;
  onDecrease: () => void;
}

export const QuantitySelector: React.FC<QuantitySelectorProps> = ({
  quantity,
  onIncrease,
  onDecrease,
}) => {
  return (
    <div className="flex items-center">
      <button
        onClick={onDecrease}
        className="flex h-[46px] w-[43px] items-center justify-center rounded border border-[#EEE] bg-white hover:bg-gray-50"
      >
        <svg
          width="13"
          height="12"
          viewBox="0 0 13 12"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M10.8125 5.4375H2.1875C2.08391 5.4375 2 5.52141 2 5.625V6.375C2 6.47859 2.08391 6.5625 2.1875 6.5625H10.8125C10.9161 6.5625 11 6.47859 11 6.375V5.625C11 5.52141 10.9161 5.4375 10.8125 5.4375Z"
            fill="black"
            stroke="black"
            strokeWidth="0.0234375"
          />
        </svg>
      </button>
      <div className="w-[40px] text-center font-jost text-base text-black">
        {quantity}
      </div>
      <button
        onClick={onIncrease}
        className="flex h-[46px] w-[43px] items-center justify-center rounded border border-[#EEE] bg-white hover:bg-gray-50"
      >
        <svg
          width="13"
          height="12"
          viewBox="0 0 13 12"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M10.8125 5.4375H7.0625V1.6875C7.0625 1.58391 6.97859 1.5 6.875 1.5H6.125C6.02141 1.5 5.9375 1.58391 5.9375 1.6875V5.4375H2.1875C2.08391 5.4375 2 5.52141 2 5.625V6.375C2 6.47859 2.08391 6.5625 2.1875 6.5625H5.9375V10.3125C5.9375 10.4161 6.02141 10.5 6.125 10.5H6.875C6.97859 10.5 7.0625 10.4161 7.0625 10.3125V6.5625H10.8125C10.9161 6.5625 11 6.47859 11 6.375V5.625C11 5.52141 10.9161 5.4375 10.8125 5.4375Z"
            fill="black"
            stroke="black"
            strokeWidth="0.0234375"
          />
        </svg>
      </button>
    </div>
  );
};

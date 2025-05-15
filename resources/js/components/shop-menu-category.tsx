import React from "react";
import { Link } from "@inertiajs/react";

interface CategoryLink {
  title: string;
  href: string;
}

interface ShopMenuCategoryProps {
  title: string;
  links: CategoryLink[];
}

export const ShopMenuCategory: React.FC<ShopMenuCategoryProps> = ({
  title,
  links,
}) => {
  return (
    <div className="flex flex-col items-start py-12 gap-5 md:items-center">
      <h3 className="text-[#252B42] font-montserrat text-base font-bold leading-6 tracking-[0.1px]">
        {title}
      </h3>
      <div className="flex flex-col items-start gap-2.5">
        {links.map((link, index) => (
          <Link
            key={index}
            href={link.href}
            className="text-[#737373] font-montserrat text-sm font-bold leading-6 tracking-[0.2px] hover:text-gray-900 transition-colors md:whitespace-normal"
          >
            {link.title}
          </Link>
        ))}
      </div>
    </div>
  );
};

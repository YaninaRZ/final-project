import { Link } from '@inertiajs/react';

export default function ButtonAdd() {
  return (
    <Link
      href={route('add-product')} 
      className="rounded-md bg-[#68513F] px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-[#000000] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
    >
      Add a product
    </Link>
  );
}

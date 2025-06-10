'use client'
import { DropdownMenu, DropdownMenuContent, DropdownMenuTrigger } from '@/components/ui/dropdown-menu';
import { SidebarMenu, SidebarMenuButton, SidebarMenuItem, useSidebar } from '@/components/ui/sidebar';
import { UserInfo } from '@/components/user-info';
import { UserMenuContent } from '@/components/user-menu-content';
import { useIsMobile } from '@/hooks/use-mobile';
import { Fragment, useState } from 'react'
import { Link, usePage } from '@inertiajs/react';
import { DropdownMenuGroup, DropdownMenuItem, DropdownMenuLabel, DropdownMenuSeparator } from '@/components/ui/dropdown-menu';
import { useMobileNavigation } from '@/hooks/use-mobile-navigation';
import { LogOut, Settings } from 'lucide-react';

import {
  Dialog,
  DialogBackdrop,
  DialogPanel,
  Popover,
  PopoverButton,
  PopoverGroup,
  PopoverPanel,
  Tab,
  TabGroup,
  TabList,
  TabPanel,
  TabPanels,
} from '@headlessui/react'
import { Bars3Icon, MagnifyingGlassIcon, ShoppingBagIcon, XMarkIcon } from '@heroicons/react/24/outline'

const navigation = {
  categories: [
    {
      id: 'Shop All',
      name: 'Shop all',
      featured: [
        {
          name: 'New Arrivals',
          href: route('products.category', { category: 'new arrivals' }),
          imageSrc: 'https://rituals.scene7.com/is/image/rituals/1115586-rituals-sa24018-sakura-2024-multi:Square?fmt=webp-alpha&hei=850&resMode=sharp2&wid=850',
          imageAlt: 'Models sitting back to back, wearing Basic Tee in black and bone.',
        },
      ],
      sections: [
        {
          id: 'Face care',
          name: 'Face care',
          items: [

            { name: 'Skinn Products', href: route('products.category', { category: 'skinn' }) },
            { name: 'Masks', href: route('products.category', { category: 'masks' }) },
          ],
        },
        {
          id: 'Hair care',
          name: 'Hair care',
          items: [
            { name: 'Shampoos', href: route('products.category', { category: 'shampoos' }) },
          ],
        },
        {
          id: 'Body care',
          name: 'Body care',
          items: [
            { name: 'Body', href: route('products.category', { category: 'body' }) },
          ],
        },
      ],
    },
  ],
  pages: [
    { name: 'New', href: route('new-products') },
    { name: 'About', href: route('about') }
  ],
}



export default function NavbarDesign() {
  const [open, setOpen] = useState(false)


  const isMobile = useIsMobile();

  const cleanup = useMobileNavigation();

  const page = usePage();
  const { auth, categoriesMenu } = page.props;
  console.log(page.props);
  return (
    <div className="bg-white">
      {/* START Mobile menu */}
      <Dialog open={open} onClose={setOpen} className="relative z-60 lg:hidden">
        <DialogBackdrop
          transition
          className="fixed inset-0 bg-black/25 transition-opacity duration-300 ease-linear data-closed:opacity-0"
        />

        <div className="fixed inset-0 z-60 flex">
          <DialogPanel
            transition
            className="relative flex w-full max-w-xs transform flex-col overflow-y-auto bg-white pb-12 shadow-xl transition duration-300 ease-in-out data-closed:-translate-x-full"
          >
            <div className="flex px-4 pt-5 pb-2">
              <button
                type="button"
                onClick={() => setOpen(false)}
                className="relative -m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400"
              >
                <span className="absolute -inset-0.5" />
                <span className="sr-only">Close menu</span>
                <XMarkIcon aria-hidden="true" className="size-6" />
              </button>
            </div>

            {/* Links */}
            <TabGroup className="mt-2">
              <div className="border-b border-gray-200">
                <TabList className="-mb-px flex space-x-8 px-4">
                  {navigation.categories.map((category) => (
                    <Tab
                      key={category.name}
                      className="flex-1 border-b-2 border-transparent px-1 py-4 text-base font-medium whitespace-nowrap text-gray-900 data-selected:border-black-600 data-selected:text-black-600"
                    >
                      {category.name}
                    </Tab>
                  ))}
                </TabList>
              </div>
              <TabPanels as={Fragment}>
                {navigation.categories.map((category) => (
                  <TabPanel key={category.name} className="space-y-10 px-4 pt-10 pb-8">
                    <div className="grid grid-cols-2 gap-x-4">
                      {category.featured.map((item) => (
                        <div key={item.name} className="group relative text-sm">
                          <img
                            alt={item.imageAlt}
                            src={item.imageSrc}
                            className="aspect-square w-full rounded-lg bg-gray-100 object-cover group-hover:opacity-75"
                          />
                          <Link href={item.href} className="mt-6 block font-medium text-gray-900">
                            <span aria-hidden="true" className="absolute inset-0 z-10" />
                            {item.name}
                          </Link>
                          <p aria-hidden="true" className="mt-1">
                            Shop now
                          </p>
                        </div>
                      ))}
                    </div>
                    {category.sections.map((section) => (
                      <div key={section.name}>
                        <p id={`${category.id}-${section.id}-heading-mobile`} className="font-medium text-gray-900">
                          {section.name}
                        </p>
                        <ul
                          role="list"
                          aria-labelledby={`${category.id}-${section.id}-heading-mobile`}
                          className="mt-6 flex flex-col space-y-6"
                        >
                          {section.items.map((item) => (
                            <li key={item.name} className="flow-root">
                              <Link href={item.href} className="-m-2 block p-2 text-gray-500">
                                {item.name}
                              </Link>
                            </li>
                          ))}
                        </ul>
                      </div>
                    ))}
                  </TabPanel>
                ))}
              </TabPanels>
            </TabGroup>

            <div className="space-y-6 border-t border-gray-200 px-4 py-6">
              {navigation.pages.map((page) => (
                <div key={page.name} className="flow-root">
                  <Link href={page.href} className="-m-2 block p-2 font-medium text-gray-900">
                    {page.name}
                  </Link>
                </div>
              ))}
            </div>

            <div className="space-y-6 border-t border-gray-200 px-4 py-6">
              {auth.user ? (
                <>
                  {/* <Link
                    href={route("user-account")}
                    className="inline-block rounded-sm border border-transparent px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A]"
                  >
                    User Account {auth.user.name}
                  </Link> */}

                  <DropdownMenu>
                    <DropdownMenuTrigger asChild>
                      <div size="lg" className="text-sidebar-accent-foreground data-[state=open]:bg-sidebar-accent group">
                        <UserInfo user={auth.user} />
                        {/* <ChevronsUpDown className="ml-auto size-4" /> */}
                      </div>
                    </DropdownMenuTrigger>
                    <DropdownMenuContent
                      className="w-(--radix-dropdown-menu-trigger-width) min-w-56 rounded-lg"
                      align="end"
                      side={'bottom'}
                    >
                      <UserMenuContent user={auth.user} />
                    </DropdownMenuContent>
                  </DropdownMenu>
                </>
              ) :
                (
                  <>
                    <Link
                      href={route("login")}
                      className="inline-block rounded-sm border border-transparent px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A]"
                    >
                      Log in
                    </Link>
                    <div className="flow-root">
                      <Link
                        href={route("register")}
                        className="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                      >
                        Register
                      </Link>
                    </div>
                  </>
                )
              }
            </div>

          </DialogPanel>
        </div>
      </Dialog>
      {/* END Mobile menu */}

      <header className="relative bg-white">


        <nav aria-label="Top" className="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <div className="border-b border-gray-200">
            <div className="flex h-16 items-center">
              <button
                type="button"
                onClick={() => setOpen(true)}
                className="relative rounded-md bg-white p-2 text-gray-400 lg:hidden"
              >
                <span className="absolute -inset-0.5" />
                <span className="sr-only">Open menu</span>
                <Bars3Icon aria-hidden="true" className="size-6" />
              </button>

              {/* Logo */}
              <div className="ml-4 flex lg:ml-0">
                <Link href="/">
                  <span className="sr-only">Skinn</span>
                  <img
                    alt=""
                    src="/images/Skinn.svg"
                    className="h-8 w-auto"
                  />
                </Link>
              </div>

              {/* Flyout menus */}
              <PopoverGroup className="hidden lg:ml-8 lg:block lg:self-stretch">
                <div className="flex h-full space-x-8">
                  {navigation.categories.map((category) => (
                    <Popover key={category.name} className="flex">
                      <div className="relative flex">
                        <PopoverButton className="relative z-60 -mb-px flex items-center border-b-2 border-transparent pt-px text-sm font-medium text-gray-700 transition-colors duration-200 ease-out hover:text-gray-800 data-open:border-black-600 data-open:text-black-600">
                          {category.name}
                        </PopoverButton>
                      </div>

                      <PopoverPanel
                        transition
                        className="absolute inset-x-0 top-full z-50 text-sm text-gray-500 transition data-closed:opacity-0 data-enter:duration-200 data-enter:ease-out data-leave:duration-150 data-leave:ease-in"
                      >

                        <div aria-hidden="true" className="absolute inset-0 top-1/2 bg-white shadow-sm" />

                        <div className="relative bg-white">
                          <div className="mx-auto max-w-7xl px-8">
                            <div className="grid grid-cols-2 gap-x-8 gap-y-10 py-16">
                              <div className="col-start-2 grid grid-cols-2 gap-x-8">
                                {category.featured.map((item) => (
                                  <div key={item.name} className="group relative text-base sm:text-sm">
                                    <img
                                      alt={item.imageAlt}
                                      src={item.imageSrc}
                                      className="aspect-square w-full rounded-lg bg-gray-100 object-cover group-hover:opacity-75"
                                    />
                                    <Link href={item.href} className="mt-6 block font-medium text-gray-900">
                                      <span aria-hidden="true" className="absolute inset-0 z-60" />
                                      {item.name}
                                    </Link>
                                    <p aria-hidden="true" className="mt-1">
                                      Shop now
                                    </p>
                                  </div>
                                ))}
                              </div>
                              <div className="row-start-1 grid grid-cols-3 gap-x-8 gap-y-10 text-sm">
                                {categoriesMenu.map((category) => (
                                  <div key={category.id}>
                                    <p id={`${category.name}-heading`} className="font-medium text-gray-900">
                                      {category.name}
                                    </p>
                                    <ul
                                      role="list"
                                      aria-labelledby={`${category.name}-heading`}
                                      className="mt-6 space-y-6 sm:mt-4 sm:space-y-4"
                                    >
                                      {category.children.map((child) => (
                                        <li key={child.name} className="flex">
                                          <Link href={route('products.category', { category: child.name.toLowerCase() })} className="hover:text-gray-800">
                                            {child.name}
                                          </Link>
                                        </li>
                                      ))}
                                    </ul>
                                  </div>
                                ))}

                                {/* {categories.map(category => <div>
                                  {category.name}
                                  {category.children.map(child => <p>{child.name}</p>)}
                                </div>)} */}

                              </div>
                            </div>
                          </div>
                        </div>
                      </PopoverPanel>
                    </Popover>
                  ))}

                  {navigation.pages.map((page) => (
                    <a
                      key={page.name}
                      href={page.href}
                      className="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800"
                    >
                      {page.name}
                    </a>
                  ))}
                </div>
              </PopoverGroup>

              <div className="ml-auto flex items-center">
                <div className="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
                  {auth.user ? (
                    auth.user.role === 'admin' ? (

                      <Link
                        href={route("dashboard")}
                        className="inline-block rounded-sm border border-transparent px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A]"
                      >
                        Admin Account
                      </Link>
                    ) : (

                      // <Link
                      //   href={route("user-account")}
                      //   className="inline-block rounded-sm border border-transparent px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A]"
                      // >
                      //   User Account {auth.user.name}
                      // </Link>

                      <DropdownMenu>
                        <DropdownMenuTrigger asChild>
                          <div size="lg" className="text-sidebar-accent-foreground data-[state=open]:bg-sidebar-accent group cursor-pointer">
                            <UserInfo user={auth.user} />
                            {/* <ChevronsUpDown className="ml-auto size-4" /> */}
                          </div>
                        </DropdownMenuTrigger>
                        <DropdownMenuContent
                          className="w-(--radix-dropdown-menu-trigger-width) min-w-56 rounded-lg"
                          align="end"
                          side={'bottom'}
                        >
                          <>
                            <DropdownMenuLabel className="p-0 font-normal">
                              <div className="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                                <UserInfo user={auth.user} showEmail={true} />
                              </div>
                            </DropdownMenuLabel>
                            <DropdownMenuSeparator />
                            <DropdownMenuGroup>
                              <DropdownMenuItem asChild>
                                <Link className="block w-full" href={route('user-account')} as="button" prefetch onClick={cleanup}>
                                  <Settings className="mr-2" />
                                  Account
                                </Link>
                              </DropdownMenuItem>
                            </DropdownMenuGroup>
                            <DropdownMenuSeparator />
                            <DropdownMenuItem asChild>
                              <Link className="block w-full" method="post" href={route('logout')} as="button" onClick={cleanup}>
                                <LogOut className="mr-2" />
                                Log out
                              </Link>
                            </DropdownMenuItem>
                          </>
                        </DropdownMenuContent>
                      </DropdownMenu>
                    )
                  ) : (
                    <>
                      <Link
                        href={route("login")}
                        className="inline-block rounded-sm border border-transparent px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A]"
                      >
                        Log in
                      </Link>
                      <span aria-hidden="true" className="h-6 w-px bg-gray-200" />
                      <Link
                        href={route("register")}
                        className="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                      >
                        Register
                      </Link>
                    </>
                  )}


                </div>

                {/* Cart */}
                <div className="ml-4 flow-root lg:ml-6">
                  <Link href={route('cart')} className="group -m-2 flex items-center p-2">
                    <ShoppingBagIcon
                      aria-hidden="true"
                      className="size-6 shrink-0 text-gray-400 group-hover:text-gray-500"
                    />

                    <span className="sr-only">items in cart, view bag</span>
                  </Link>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </header>
    </div>
  )
}

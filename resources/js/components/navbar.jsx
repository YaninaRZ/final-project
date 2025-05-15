"use client";

import * as React from "react";
import { Link } from "@inertiajs/react";
import { Menu } from "lucide-react";
import LogoDesign from "./logo-design";
import { Button } from "@/components/ui/button";
import {
  Sheet,
  SheetContent,
  SheetHeader,
  SheetTitle,
  SheetTrigger,
} from "@/components/ui/sheet";
import {
  NavigationMenu,
  NavigationMenuItem,
  NavigationMenuList,
  navigationMenuTriggerStyle,
} from "@/components/ui/navigation-menu";
import { cn } from "@/lib/utils";

const navigationItems = [
  {
    title: "Home",
    href: "/",
  },
  {
    title: "Products",
    href: "/products",
  },
  {
    title: "About",
    href: "/about",
  },
  {
    title: "Contact",
    href: "/contact",
  },
];

export function Navbar() {
  return (
    <nav className="border-sidebar-border/80 border-b bg-white">
      <div className="mx-auto flex h-14 items-center justify-between px-4 md:max-w-7xl">
        <div className="flex items-center">
          <LogoDesign />
        </div>

        {/* Desktop Navigation */}
        <div className="hidden md:flex">
          <NavigationMenu>
            <NavigationMenuList className="flex space-x-2">
              {navigationItems.map((item, index) => (
                <NavigationMenuItem key={index}>
                  <Link
                    href={item.href}
                    className={cn(
                      navigationMenuTriggerStyle(),
                      "h-9 cursor-pointer px-3",
                    )}
                  >
                    {item.title}
                  </Link>
                </NavigationMenuItem>
              ))}
            </NavigationMenuList>
          </NavigationMenu>
        </div>

        {/* Mobile Menu */}
        <div className="flex md:hidden">
          <Sheet>
            <SheetTrigger asChild>
              <Button variant="ghost" size="icon" className="h-9 w-9">
                <Menu className="h-5 w-5" />
                <span className="sr-only">Toggle menu</span>
              </Button>
            </SheetTrigger>
            <SheetContent side="right" className="w-64">
              <SheetHeader>
                <SheetTitle>Navigation</SheetTitle>
              </SheetHeader>
              <div className="mt-4 flex flex-col space-y-3">
                {navigationItems.map((item, index) => (
                  <Link
                    key={index}
                    href={item.href}
                    className="text-foreground/70 hover:text-foreground block rounded-md px-3 py-2 text-sm font-medium hover:bg-accent"
                  >
                    {item.title}
                  </Link>
                ))}
              </div>
            </SheetContent>
          </Sheet>
        </div>
      </div>
    </nav>
  );
}

export default Navbar;

import posts from '@/data/posts';
import ShopNowButton from './ui/shopnowbtn';

export default function ProductsV1() {
    return (
        <div className="bg-white py-24 sm:py-32">
            <div className="mx-auto max-w-7xl px-6 lg:px-8">
                <div className="mx-auto max-w-2xl text-center">
                    <h2 className="text-4xl font-semibold tracking-tight text-balance text-gray-900 sm:text-5xl">Products</h2>
                    <p className="mt-2 text-lg/8 text-gray-600">Healthy Skinn</p>
                </div>
                <div className="mx-auto mt-16 grid max-w-2xl auto-rows-fr grid-cols-1 gap-8 sm:mt-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                    {posts.map((post) => (
                        <article
                            key={post.id}
                            className="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl px-8 pt-80 pb-8 sm:pt-48 lg:pt-80"
                        >
                            <img alt="" src={post.imageSrc} className="absolute inset-0 -z-10 size-full object-cover" />
                            <div className="absolute inset-0 -z-10 rounded-2xl ring-1 ring-gray-900/10 ring-inset" />

                            <div className="text-black-300 flex flex-wrap items-center gap-y-1 overflow-hidden text-sm/6">
                                <time className="mr-8">{post.categories}</time>
                                <div className="-ml-4 flex items-center gap-x-4">
                                    <svg viewBox="0 0 2 2" className="-ml-0.5 size-0.5 flex-none fill-white/50">
                                        <circle r={1} cx={1} cy={1} />
                                    </svg>
                                </div>
                            </div>
                            <h3 className="mt-3 text-lg/6 font-semibold text-black">
                                <a href={post.href}>
                                    <span className="absolute inset-0" />
                                    {post.product}
                                </a>
                            </h3>
                            <ShopNowButton />
                        </article>
                    ))}
                </div>
            </div>
        </div>
    );
}

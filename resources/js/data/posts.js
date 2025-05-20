const posts = [
    {
        id: 1,
        name: 'Anti Acne Face Wash',
        href: '',
        description: `Say goodbye to breakouts and hello to glow-ups with Skinn’s Anti Acne Face Wash! This powerhouse formula dives deep to clear your pores, fighting acne while calming your skin — because your Skinn deserves more than just a wash, it deserves a fresh start. Let’s be real: clear skin isn’t just a goal, it’s a lifestyle. With every splash, you’re washing away the drama and revealing the flawless you. Ready to let your Skinn do the talking?`,
        imageSrc: '/images/cleanser.svg',
        categories: 'Cleanser',
    },
    {
        id: 2,
        name: 'Vitamin C Hand & Nail Cream',
        href: '',
        description: `Glow from hand to nail with Skinn’s Vitamin C Hand & Nail Cream — your new secret weapon for soft, radiant skin and strong nails. Packed with antioxidants and nourishing vitamins, this cream doesn’t just hydrate; it brightens, repairs, and protects your Skinn from daily stress. Whether you’re typing, texting, or tackling the day, keep your hands and nails camera-ready and glow-worthy. Because your Skinn isn’t just your body’s outfit, it’s your statement.`,
        imageSrc: '/images/vitamin.png',
        categories: 'Serums',
    },
    {
        id: 3,
        name: 'Vitamin C Clay Face Mask',
        href: '',
        description: `Time to clay it on thick with Skinn’s Vitamin C Clay Face Mask — a detoxifying and brightening treatment that’s as serious about glow as you are. This mask draws out impurities, tightens pores, and infuses your Skinn with a blast of Vitamin C to leave you refreshed, radiant, and ready to face the world. Because good Skinn isn’t just skin deep — it’s a vibe, a glow, and a feeling you wear every day. Mask on, glow up!`,
        imageSrc: '/images/coffee.svg',
        categories: 'Body Wash',
    },
].map((post) => ({
    ...post,
    href: `/postDetail/${post.id}`,
}));

export default posts;

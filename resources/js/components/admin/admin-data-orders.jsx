const order = [
    {
        Product: 'Coffee Mask',
        OrderID: '1',
        Date: '01/01/01',
        Name: 'Patrick',
        Status: 'Ordered',
        Amount: '234',
    },
    {
        Product: 'Tea Mask',
        OrderID: '2',
        Date: '01/01/02',
        Name: 'Patrick',
        Status: 'Ordered',
        Amount: '234',
    },
    {
        Product: 'Jasmin Mask',
        OrderID: '3',
        Date: '01/01/03',
        Name: 'Patrick',
        Status: 'Ordered',
        Amount: '234',
    },
    {
        Product: 'Coffee Mask',
        OrderID: '4',
        Date: '01/01/04',
        Name: 'Patrick',
        Status: 'Ordered',
        Amount: '234',
    },
].map((item) => ({
    ...item,
    href: `/ordered-order-details/${item.OrderID}`,
}));

export default order;

import React, { useEffect, useState } from 'react';
import { Table, Button } from 'react-bootstrap';
import { useHistory } from 'react-router-dom';

const Cart = () => {
    const [cartItems, setCartItems] = useState([]);
    const history = useHistory();

    useEffect(() => {
        // Fetch cart items from the backend
        const fetchCartItems = async () => {
            const response = await fetch('/api/cart.php');
            const data = await response.json();
            setCartItems(data);
        };

        fetchCartItems();
    }, []);

    const handleRemoveItem = async (itemId) => {
        await fetch(`/api/cart.php?action=remove&id=${itemId}`, {
            method: 'DELETE',
        });
        setCartItems(cartItems.filter(item => item.id !== itemId));
    };

    const handleCheckout = () => {
        history.push('/checkout');
    };

    return (
        <div>
            <h2>Your Shopping Cart</h2>
            {cartItems.length === 0 ? (
                <p>Your cart is empty.</p>
            ) : (
                <Table striped bordered hover>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {cartItems.map(item => (
                            <tr key={item.id}>
                                <td>{item.name}</td>
                                <td>{item.quantity}</td>
                                <td>${item.price}</td>
                                <td>
                                    <Button variant="danger" onClick={() => handleRemoveItem(item.id)}>Remove</Button>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </Table>
            )}
            {cartItems.length > 0 && (
                <Button variant="primary" onClick={handleCheckout}>Proceed to Checkout</Button>
            )}
        </div>
    );
};

export default Cart;
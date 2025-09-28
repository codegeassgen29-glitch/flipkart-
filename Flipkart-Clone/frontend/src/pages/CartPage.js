import React, { useEffect, useState } from 'react';
import { Container, Row, Col, Button } from 'react-bootstrap';
import Cart from '../components/Cart';

const CartPage = () => {
    const [cartItems, setCartItems] = useState([]);

    useEffect(() => {
        // Fetch cart items from the backend API
        const fetchCartItems = async () => {
            const response = await fetch('/api/cart.php');
            const data = await response.json();
            setCartItems(data);
        };

        fetchCartItems();
    }, []);

    const handleCheckout = () => {
        // Handle checkout process
        alert('Proceeding to checkout...');
    };

    return (
        <Container>
            <h1>Your Shopping Cart</h1>
            <Row>
                <Col>
                    <Cart items={cartItems} />
                    <Button variant="primary" onClick={handleCheckout}>
                        Proceed to Checkout
                    </Button>
                </Col>
            </Row>
        </Container>
    );
};

export default CartPage;
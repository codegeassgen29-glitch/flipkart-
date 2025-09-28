import React, { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';
import { Card, Button, Spinner } from 'react-bootstrap';

const ProductDetail = () => {
    const { id } = useParams();
    const [product, setProduct] = useState(null);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        const fetchProduct = async () => {
            try {
                const response = await fetch(`/api/products.php?id=${id}`);
                const data = await response.json();
                setProduct(data);
            } catch (error) {
                console.error('Error fetching product:', error);
            } finally {
                setLoading(false);
            }
        };

        fetchProduct();
    }, [id]);

    if (loading) {
        return <Spinner animation="border" />;
    }

    if (!product) {
        return <div>Product not found</div>;
    }

    return (
        <div className="product-detail">
            <Card>
                <Card.Img variant="top" src={product.image} />
                <Card.Body>
                    <Card.Title>{product.name}</Card.Title>
                    <Card.Text>{product.description}</Card.Text>
                    <Card.Text>Price: ${product.price}</Card.Text>
                    <Button variant="primary">Add to Cart</Button>
                </Card.Body>
            </Card>
        </div>
    );
};

export default ProductDetail;
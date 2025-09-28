import React from 'react';
import { Container, Row, Col, Jumbotron } from 'react-bootstrap';
import ProductList from '../components/ProductList';

const Home = () => {
    return (
        <Container>
            <Jumbotron className="text-center">
                <h1>Welcome to Flipkart Clone</h1>
                <p>Your one-stop shop for all your needs!</p>
            </Jumbotron>
            <Row>
                <Col>
                    <ProductList />
                </Col>
            </Row>
        </Container>
    );
};

export default Home;
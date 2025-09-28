import React, { useEffect, useState } from 'react';
import { Container, Row, Col, Card, Button } from 'react-bootstrap';
import axios from 'axios';

const Profile = () => {
    const [user, setUser] = useState(null);

    useEffect(() => {
        const fetchUserProfile = async () => {
            try {
                const response = await axios.get('/api/user.php');
                setUser(response.data);
            } catch (error) {
                console.error('Error fetching user profile:', error);
            }
        };

        fetchUserProfile();
    }, []);

    if (!user) {
        return <div>Loading...</div>;
    }

    return (
        <Container>
            <h1>User Profile</h1>
            <Row>
                <Col md={4}>
                    <Card>
                        <Card.Body>
                            <Card.Title>{user.name}</Card.Title>
                            <Card.Text>
                                <strong>Email:</strong> {user.email}
                            </Card.Text>
                            <Button variant="primary">Edit Profile</Button>
                        </Card.Body>
                    </Card>
                </Col>
            </Row>
        </Container>
    );
};

export default Profile;
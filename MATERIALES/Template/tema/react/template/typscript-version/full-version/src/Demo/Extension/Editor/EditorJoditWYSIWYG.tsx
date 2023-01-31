import * as React from 'react';
import { useState } from 'react';
import { Row, Col, Card } from 'react-bootstrap';
import 'jodit';
import 'jodit/build/jodit.min.css';
import JoditEditor from 'jodit-react';
import { IJodit } from 'jodit';

const EditorJoditWYSIWYG = () => {
    const [content] = useState('Hello...');

    const config: Partial<IJodit['options']> = {
        readonly: false
    };
    return (
        <>
            <Row>
                <Col>
                    <Card>
                        <Card.Header>
                            <Card.Title as="h5">Jodit WYSIWYG Editor</Card.Title>
                        </Card.Header>
                        <Card.Body>
                            <JoditEditor value={content} config={config as any} />
                        </Card.Body>
                    </Card>
                </Col>
            </Row>
        </>
    );
};
export default EditorJoditWYSIWYG;

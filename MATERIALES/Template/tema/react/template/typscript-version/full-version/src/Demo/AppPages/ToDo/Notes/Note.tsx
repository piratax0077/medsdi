import * as React from 'react';
import { useEffect, useState } from 'react';
const saveText = 'SAVE';
const removeToolTipText = 'Remove Note';
interface NoteProps {
    index: number;
    onChange: (newText: string, i: number) => void;
    onRemove: (i: number) => void;
    position: { xPos: number; yPos: number } | false;
    children: React.ReactNode;
    onDrag: (position: any, i: number) => void;
}
const Note = (props: NoteProps) => {
    let newText: HTMLTextAreaElement | null;
    let style: { left: any; top: any };
    const [editing, setEditing] = useState(false);
    const updatePosition = ({ position }: NoteProps) => {
        style = {
            left: position ? position.xPos : randomBetween(0, window.innerWidth - 280) + 'px',
            top: position ? position.yPos : randomBetween(0, window.innerHeight - 280) + 'px'
        };
    };
    useEffect(() => {
        updatePosition(props);
    }, [props]);
    const onDragStart = (e: React.DragEvent<HTMLDivElement>) => {
        const { index } = props;
        e.dataTransfer.setData('application/x-note', `${index}`);
    };
    // Get random position
    const randomBetween = (min: number, max: number) => {
        return min + Math.ceil(Math.random() * max);
    };
    // Turn on edit note
    const edit = () => {
        setEditing(true);
    };
    // Save edits
    const save = () => {
        if (newText) {
            props.onChange(newText.value, props.index);
            setEditing(false);
        }
    };
    // Remove note
    const remove = () => {
        props.onRemove(props.index);
    };
    // Render note body
    const renderNoteBody = (content: React.ReactNode, save?: () => void) => {
        return (
            <div draggable="true" onDragStart={(e) => onDragStart(e)} onDoubleClick={() => edit()} className="note" style={style}>
                <article>
                    <header className="note__header">
                        <div className="wrapper-tooltip">
                            <span onClick={() => remove()} className="close hairline" />
                            <div className="tooltip">{removeToolTipText}</div>
                        </div>
                    </header>
                    <div className="note__content">{content}</div>
                    <footer className="note__footer">
                        <div className="note__fold" />
                        {save ? (
                            <div className="note__save" onClick={() => save()}>
                                {saveText}
                            </div>
                        ) : (
                            ''
                        )}
                    </footer>
                </article>
            </div>
        );
    };
    // Render note preview
    const renderDisplay = () => {
        return renderNoteBody(props.children);
    };
    // Render note edit mode
    const renderForm = () => {
        const content = (
            <div>
                <textarea ref={(ref) => (newText = ref)} className="note__textarea">
                    {props.children}
                </textarea>
            </div>
        );
        return renderNoteBody(content, save);
    };
    return editing ? renderForm() : renderDisplay();
};
export default Note;

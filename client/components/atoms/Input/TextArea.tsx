import { ChangeEvent, CSSProperties } from 'react';

type TextAreaProps = {
  value: string;
  style?: CSSProperties;
  onChange: (e: ChangeEvent<HTMLTextAreaElement>) => void;
};

const TextArea = ({ value, style, onChange }: TextAreaProps) => {
  return (
    <textarea style={{ display: 'block', minHeight: '6rem', ...style }} value={value} onChange={onChange}></textarea>
  );
};

export default TextArea;

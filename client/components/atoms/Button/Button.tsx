import { CSSProperties, MouseEvent } from 'react';
import { color } from '../../../styles/color';

type ButtonProps = {
  type: 'button' | 'submit' | 'reset' | undefined;
  children: React.ReactNode;
  style?: CSSProperties;
  onClick?: (e: MouseEvent<HTMLButtonElement>) => void;
};

const Button = ({ type, children, style, onClick }: ButtonProps) => {
  return (
    <button
      style={{
        fontSize: '1rem',
        padding: '1.25rem 3rem',
        borderRadius: '3rem',
        border: 0,
        backgroundColor: color.black,
        color: color.white,
        ...style,
      }}
      onClick={onClick}
      type={type}
    >
      {children}
    </button>
  );
};

export default Button;

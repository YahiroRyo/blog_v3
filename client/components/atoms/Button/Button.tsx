import { CSSProperties } from 'react';

type ButtonProps = {
  type: 'button' | 'submit' | 'reset' | undefined;
  style?: CSSProperties;
  children: React.ReactNode;
};

const Button = ({ type, children, style }: ButtonProps) => {
  return (
    <button style={style} type={type}>
      {children}
    </button>
  );
};

export default Button;

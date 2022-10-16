import { CSSProperties } from 'react';
import { color } from '../../../styles/color';

type TitleProps = {
  children: React.ReactNode;
  style?: CSSProperties;
};

const Title = ({ children, style }: TitleProps) => {
  return (
    <h1
      style={{
        ...style,
        fontSize: '1.5rem',
        color: color.black,
        lineHeight: '1.75',
        margin: '0',
      }}
    >
      {children}
    </h1>
  );
};

export default Title;

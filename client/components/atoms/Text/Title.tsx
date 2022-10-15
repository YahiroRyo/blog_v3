import { color } from '../../../styles/color';

type TitleProps = {
  children: React.ReactNode;
};

const Title = ({ children }: TitleProps) => {
  return (
    <h1
      style={{
        fontSize: '1.5rem',
        color: color.black,
      }}
    >
      {children}
    </h1>
  );
};

export default Title;

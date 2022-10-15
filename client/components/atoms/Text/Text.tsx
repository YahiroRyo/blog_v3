import { color } from '../../../styles/color';

type TextProps = {
  children: React.ReactNode;
};

const Text = ({ children }: TextProps) => {
  return (
    <h1
      style={{
        fontSize: '1rem',
        color: color.black,
      }}
    >
      {children}
    </h1>
  );
};

export default Text;

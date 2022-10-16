import { color } from '../../../styles/color';

type TextProps = {
  children: React.ReactNode;
};

const Text = ({ children }: TextProps) => {
  return (
    <p
      style={{
        fontSize: '1rem',
        margin: 0,
        color: color.black,
      }}
    >
      {children}
    </p>
  );
};

export default Text;

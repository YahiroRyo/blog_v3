import { color } from '../../../styles/color';

type LabelProps = {
  children: React.ReactNode;
};

const Label = ({ children }: LabelProps) => {
  return (
    <>
      <label
        style={{
          color: color.black,
          fontSize: '1rem',
        }}
      >
        {children}
      </label>
      <br />
    </>
  );
};

export default Label;

import { color } from '../../../styles/color';

type ErrorTextProps = {
  children: React.ReactNode;
};

const ErrorText = ({ children }: ErrorTextProps) => {
  return (
    <p
      style={{
        color: color.danger,
        fontSize: '1rem',
        fontWeight: 'bold',
      }}
    >
      {children}
    </p>
  );
};

export default ErrorText;

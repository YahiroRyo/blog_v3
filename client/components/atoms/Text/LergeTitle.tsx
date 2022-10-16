import { color } from '../../../styles/color';

type LergeTitleProps = {
  children: React.ReactNode;
};

const LergeTitle = ({ children }: LergeTitleProps) => {
  return <p style={{ color: color.black, fontWeight: 'bold', fontSize: '2rem', margin: 0 }}>{children}</p>;
};

export default LergeTitle;

import Link from 'next/link';
import LergeTitle from '../../atoms/Text/LergeTitle';

const Logo = () => {
  return (
    <Link href='/'>
      <a style={{ textDecoration: 'none' }}>
        <LergeTitle>rm -rf /</LergeTitle>
      </a>
    </Link>
  );
};

export default Logo;

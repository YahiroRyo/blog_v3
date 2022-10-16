import Link from 'next/link';
import { color } from '../../../styles/color';
import { NavItem } from '../../../types/Layout/NavItem';

const NavigationItem = ({ link, children }: NavItem) => {
  return (
    <li style={{ listStyle: 'none', height: '100%' }}>
      <Link href={link}>
        <a
          style={{
            textDecoration: 'none',
            color: color.black,
            height: '100%',
            display: 'flex',
            alignItems: 'center',
            justifyContent: 'center',
            padding: '0 1rem',
          }}
        >
          {children}
        </a>
      </Link>
    </li>
  );
};

export default NavigationItem;

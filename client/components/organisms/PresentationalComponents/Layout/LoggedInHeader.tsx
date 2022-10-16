import { color } from '../../../../styles/color';
import { NavItem } from '../../../../types/Layout/NavItem';
import Logo from '../../../molecules/Layout/Logo';
import Navigation from '../../../molecules/Layout/Navigation';

const LoggedInHeader = () => {
  const navigationItems: NavItem[] = [
    {
      link: '/admin',
      children: 'トップ',
    },
    {
      link: '/admin/blogs',
      children: 'ブログ一覧',
    },
  ];

  return (
    <header style={{ height: '5rem', backgroundColor: color.white, width: '100%' }}>
      <div
        style={{
          width: '80%',
          margin: '0 auto',
          display: 'flex',
          alignItems: 'center',
          justifyContent: 'space-between',
          height: '100%',
        }}
      >
        <Logo />
        <Navigation items={navigationItems} />
      </div>
    </header>
  );
};

export default LoggedInHeader;

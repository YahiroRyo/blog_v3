import { color } from '../../../../styles/color';
import Logo from '../../../molecules/Layout/Logo';

const Header = () => {
  return (
    <header style={{ height: '5rem', backgroundColor: color.white, width: '100%' }}>
      <div style={{ width: '80%', margin: '0 auto', display: 'flex', alignItems: 'center', height: '100%' }}>
        <Logo />
      </div>
    </header>
  );
};

export default Header;

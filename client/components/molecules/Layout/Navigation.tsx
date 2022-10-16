import { NavItem } from '../../../types/Layout/NavItem';
import NavigationItem from '../../atoms/Layout/NavigationItem';

type NavigationProps = {
  items: NavItem[];
};

const Navigation = ({ items }: NavigationProps) => {
  return (
    <nav style={{ height: '100%' }}>
      <ul style={{ display: 'flex', height: '100%', columnGap: '2rem', margin: 0 }}>
        {items.map((item, index) => (
          <NavigationItem key={index} link={item.link}>
            {item.children}
          </NavigationItem>
        ))}
      </ul>
    </nav>
  );
};

export default Navigation;

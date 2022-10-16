import { color } from '../../../../styles/color';

type SiteProps = {
  children: React.ReactNode;
};

const Site = ({ children }: SiteProps) => {
  return (
    <main style={{ backgroundColor: color.whiteDark, minHeight: 'calc(100vh - 5rem)' }}>
      <div style={{ width: '80%', margin: '0 auto', padding: '2rem 0' }}>{children}</div>
    </main>
  );
};

export default Site;

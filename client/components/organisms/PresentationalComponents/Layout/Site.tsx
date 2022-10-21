import { useEffect, useState } from 'react';
import { color } from '../../../../styles/color';

type SiteProps = {
  children: React.ReactNode;
  useResize?: boolean;
};

const Site = ({ children, useResize }: SiteProps) => {
  const [width, setWidth] = useState<string>('80%');

  useEffect(() => {
    if (typeof window === 'undefined' || !useResize) return;

    const handleResize = () => {
      if (window.innerWidth > 1000) {
        setWidth('60%');
        return;
      }
      if (window.innerWidth > 768) {
        setWidth('80%');
        return;
      }
      if (window.innerWidth > 500) {
        setWidth('90%');
        return;
      }
    };

    window.addEventListener('resize', handleResize);
    handleResize();
    return () => window.removeEventListener('resize', handleResize);
  }, []);

  return (
    <main style={{ backgroundColor: color.whiteDark, minHeight: 'calc(100vh - 5rem)' }}>
      <div style={{ width: width, margin: '0 auto', padding: '2rem 0' }}>{children}</div>
    </main>
  );
};

export default Site;

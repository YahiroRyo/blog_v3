import Site from '../../PresentationalComponents/Layout/Site';

type SiteContainerProps = {
  children: React.ReactNode;
  useResize?: boolean;
};

const SiteContainer = ({ children, useResize }: SiteContainerProps) => {
  return <Site useResize={useResize}>{children}</Site>;
};

export default SiteContainer;

import Site from '../../PresentationalComponents/Layout/Site';

type SiteContainerProps = {
  children: React.ReactNode;
};

const SiteContainer = ({ children }: SiteContainerProps) => {
  return <Site>{children}</Site>;
};

export default SiteContainer;

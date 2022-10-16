import '../styles/reset.scss';
import '../styles/globals.scss';
import type { AppProps } from 'next/app';
import axios from 'axios';
import HeaderContainer from '../components/organisms/ContainerComponents/Layout/HeaderContainer';

function MyApp({ Component, pageProps }: AppProps) {
  axios.defaults.withCredentials = true;

  return (
    <>
      <HeaderContainer />
      <Component {...pageProps} />
    </>
  );
}

export default MyApp;

import '../styles/reset.scss';
import '../styles/globals.scss';
import type { AppProps } from 'next/app';
import axios from 'axios';

function MyApp({ Component, pageProps }: AppProps) {
  axios.defaults.withCredentials = true;

  return <Component {...pageProps} />;
}

export default MyApp;

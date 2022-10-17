import { Cookie } from '../../types/Cookie/Cookie';
import { isClient } from '../Env';

export const getCookie = (cookie: string): Cookie => {
  const result: Cookie = {};

  const variables = cookie.split(';');
  variables.forEach((variable) => {
    const [key, value] = variable.split('=');
    result[key] = value;
  });

  return result;
};

export const cookieOfString = (cookie: Cookie): string => {
  let result = '';

  Object.keys(cookie).forEach((key) => {
    result += `${key}=${cookie[key]};`;
  });

  return result;
};

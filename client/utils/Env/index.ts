export const isClient = (): boolean => {
  return typeof window !== 'undefined';
};

export const isServer = (): boolean => {
  return typeof window === 'undefined';
};

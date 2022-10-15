/** @type {import('next').NextConfig} */
const nextConfig = {
  reactStrictMode: true,
  swcMinify: true,
  experimental: {
    optimizeFonts: true,
  },
  images: {
    domains: ['localhost'],
  },
};

module.exports = nextConfig;

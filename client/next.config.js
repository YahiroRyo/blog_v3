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
  webpack: (config, { isServer }) => {
    config.experiments = {
      asyncWebAssembly: true,
      layers: true,
    };
    config.output.webassemblyModuleFilename = (isServer ? '../' : '') + 'static/wasm/[modulehash].wasm';
    return config;
  },
};

module.exports = nextConfig;

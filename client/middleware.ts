import { NextRequest, NextResponse } from 'next/server';

export const middleware = (req: NextRequest) => {
  const url = req.nextUrl;

  // if (
  //   !url.pathname.includes('/admin') &&
  //   !url.pathname.includes('/admin/login') &&
  //   !url.pathname.includes('/admin/create')
  // ) {
  //   const redirectUrl = req.nextUrl.clone();
  //   redirectUrl.pathname = '/';
  //   return NextResponse.redirect(redirectUrl);
  // }

  return NextResponse.next(req);
};

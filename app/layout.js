export const metadata = { title: 'Tu app Next.js en FullHosting' };

export default function RootLayout({ children }) {
  return (
    <html lang="es">
      <body style={{ fontFamily: 'system-ui', maxWidth: '40rem', margin: '4rem auto', padding: '0 1rem' }}>{children}</body>
    </html>
  );
}

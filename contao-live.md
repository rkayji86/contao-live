### create .env and .env.local file

1. APP\_SECRET=d8e246b516fe79f5039a1b46a1e7b019519bc23cd316fe17bbd9cda13eebf767
2. DATABASE\_URL='mysql://user:password@localhost/gutser\_faq?serverVersion=8.0.43' // Connect your database and version here
   
3. \# Notion Credentials
4. NOTION\_TOKEN=ntn\_13919493318XesZWvRO1aWHtx9mJwpJ8BXgGPEDKeVI4Mn
5. NOTION\_FAQ\_DATABASE=2a833daa9cc68051baa0d62eb98eb11b



   Run the **composer install**

   

   **vendor/bin/contao-console contao:migrate**

   **vendor/bin/contao-console cache:clear**

   **vendor/bin/contao-console contao:user:create**



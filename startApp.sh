
openssl smime -encrypt -binary -aes-256-cbc \
-in ./src/conFig/config.json \
-out ./src/ConFig/initDB.enc \
-outform DER  ./src/secure/server_Cert.pem


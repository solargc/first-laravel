{ pkgs ? import <nixpkgs> {} }:

pkgs.mkShellNoCC {
  packages = [
    pkgs.php83
    pkgs.php83Packages.composer
    pkgs.nodejs_24
    pkgs.tailwindcss_4
    pkgs.tailwindcss-language-server
    pkgs.sqlite
    pkgs.git
    pkgs.phpactor
  ];
}

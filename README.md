# Fong SP:

Public-facing presenting projects.

User part - central point for account management and settings.
Acts as the gateway to interact with different applications.

## Scalability and Hosting:

The system is designed to accommodate growth and potential future collaboration.
The modular structure facilitates the extraction or migration of components to separate servers if needed.

## API Communication:

Modules communicate through APIs, supporting a decoupled and flexible architecture.
Potential for different modules to be developed and maintained independently.

## User-Centric Focus:

Emphasizes user experience by allowing customization and tracking of progress.
Centralizes user-related functionalities.

## Subparts (/ProjectApps)

### DGW App:

Currently embede in main app. but designed for potential future migration to a high-performance server.
Associated API controllers handle DGW tracking data, calculations, and other functionalities.

Provides functionality for tracking progress through quests and associated stats.
Contains the business logic for the system.

-- *** --

## Tech:
PHP, SQL, Laravel, Web Components, Tailwind, Tailwind Elements, Mamba UI

## License

Licensed under the [MIT license](https://opensource.org/licenses/MIT).

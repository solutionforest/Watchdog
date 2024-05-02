<p align="center"><a href="https://solutionforest.com" target="_blank"><img src="https://github.com/solutionforest/.github/blob/main/docs/images/sf.png?raw=true" width="200"></a></p>


## About Solution Forest

[Solution Forest](https://solutionforest.com) Web development agency based in Hong Kong. We help customers to solve their problems. We Love Open Soruces. 

We have built a collection of best-in-class products:

- [VantagoAds](https://vantagoads.com): A self manage Ads Server, Simplify Your Advertising Strategy.
- [GatherPro.events](https://gatherpro.events): A Event Photos management tools, Streamline Your Event Photos.
- [Website CMS Management](https://filamentphp.com/plugins/solution-forest-cms-website): Website CMS Management

# Watchdog (看門狗) - NativePHP Website Monitor (Desktop Application)

Welcome to the NativePHP Website Monitor, an open-source tool designed to help developers and system administrators keep track of the uptime and performance of their websites. This project is built using NativePHP and utilizes the Spatie Laravel Uptime Monitor package for robust monitoring capabilities.

## Features

- **Real-time Monitoring:** Continuous monitoring of website uptime.
- **Alert System:** Notifications for downtime and performance issues.
- **Easy Configuration:** Simple setup process and easy to manage.


## Wishlist

- [ ] **Status Code Validation:** Ensure that monitored websites return a correct HTTP status code of 200, indicating that the site is not only up but also operational.
- [ ] **Content Validation:** Check for specific keywords or phrases on the webpage to confirm that the correct content is being served.
- [ ] **Performance Benchmarking:** Track and report on the loading times and responsiveness of the monitored sites, allowing for performance optimization.
- [ ] **API Monitoring:** Extend monitoring capabilities to include RESTful APIs, ensuring that APIs respond correctly in both data and performance.
- [ ] **Extended Notification Options:** Expand the alert system to include more customizable options such as SMS alerts, integration with Slack, or other real-time communication tools.

## Getting Started

### Prerequisites

Before you install the NativePHP Website Monitor, make sure you have the following installed on your system:

- PHP 8.2 or higher
- Composer
- NPM

### Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/solutionforest/Watchdog.git
   ```
2. Navigate to the project directory:
   ```bash
   cd Watchdog
   ```
3. Install dependencies:
   ```bash
   cp .env.example .env
   composer install
   php artisan key:generate
   php artisan native:install
   ```


### Configuration

Edit the `config/uptime-monitor.php` file to set up your monitoring preferences and add the websites you want to monitor.

https://spatie.be/docs/laravel-uptime-monitor/v3/advanced-usage/customizing-the-uptime-check

### Usage

Run the monitoring script to start monitoring your websites:

```bash
php artisan native:serve
```

## Contributing

We welcome contributions from the community. Whether you're fixing bugs, adding new features, or improving the documentation, here is how you can contribute:

1. Fork the repository and clone it locally.
2. Create a new branch for your edits.
3. Commit your changes with a descriptive message.
4. Push your branch and submit a pull request.

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for detailed information on how to contribute.

## Screenshot
<img width="400" alt="image" src="https://github.com/solutionforest/Watchdog/assets/68211972/525656a9-2739-48b6-9f5f-822960d45356">

<img width="400" alt="image" src="https://github.com/solutionforest/Watchdog/assets/68211972/e3bd6957-c2ac-49cb-a2f8-ca3f7cbccfc4">

## License

This project is open source and available under the [MIT License](LICENSE).

## Acknowledgments

- This project uses [NativePHP](https://nativephp.com/) for some of its core functionality.
- This project uses [Spatie Laravel Uptime Monitor](https://github.com/spatie/laravel-uptime-monitor) for some of its core functionality.
- Thanks to all the contributors who spend time improving this tool.

For more information, questions, or feedback, please contact us via the issues section of this repository.

---

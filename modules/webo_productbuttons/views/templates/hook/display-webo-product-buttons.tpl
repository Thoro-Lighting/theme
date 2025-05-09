{if !empty($three_dimensional_link) || !empty($ar_linkx)}
    <div class="product-buttons">
        <div class="product-buttons__wrapper">
            {if !empty($three_dimensional_link)}
                <button type="button" class="product-buttons__item btn-white" data-toggle="arlity-viewer-open-modal">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="3.5" y="3.5" width="17" height="17" rx="1.5" stroke="#3D4C99" />
                        <path
                            d="M8.968 14.76C8.59467 14.76 8.26133 14.696 7.968 14.568C7.67467 14.44 7.44267 14.256 7.272 14.016C7.10667 13.776 7.016 13.4933 7 13.168H7.944C7.97067 13.328 8.024 13.4667 8.104 13.584C8.18933 13.7013 8.30133 13.792 8.44 13.856C8.57867 13.9147 8.74133 13.944 8.928 13.944H9.008C9.20533 13.944 9.37867 13.9067 9.528 13.832C9.67733 13.752 9.78933 13.6507 9.864 13.528C9.944 13.4053 9.984 13.2667 9.984 13.112C9.984 12.856 9.89067 12.656 9.704 12.512C9.52267 12.3627 9.28267 12.288 8.984 12.288H8.56V11.472H8.96C9.15733 11.472 9.33067 11.4373 9.48 11.368C9.62933 11.2933 9.744 11.192 9.824 11.064C9.90933 10.936 9.952 10.7893 9.952 10.624C9.952 10.384 9.864 10.1893 9.688 10.04C9.51733 9.89067 9.29867 9.816 9.032 9.816H8.952C8.712 9.816 8.504 9.89067 8.328 10.04C8.15733 10.184 8.06133 10.3733 8.04 10.608H7.104C7.11467 10.2987 7.20267 10.024 7.368 9.784C7.53867 9.53867 7.76533 9.34667 8.048 9.208C8.336 9.06933 8.656 9 9.008 9C9.37067 9 9.696 9.06933 9.984 9.208C10.272 9.34667 10.496 9.53333 10.656 9.768C10.816 9.99733 10.896 10.2507 10.896 10.528C10.896 10.8587 10.8053 11.1413 10.624 11.376C10.448 11.6107 10.2133 11.7707 9.92 11.856C10.2187 11.936 10.4613 12.0933 10.648 12.328C10.84 12.5573 10.936 12.84 10.936 13.176C10.936 13.496 10.8507 13.776 10.68 14.016C10.5093 14.256 10.2747 14.44 9.976 14.568C9.68267 14.696 9.34667 14.76 8.968 14.76Z"
                            fill="#3D4C99" />
                        <path
                            d="M11.9102 9.08H13.8702C14.4142 9.08 14.8915 9.18933 15.3022 9.408C15.7129 9.62667 16.0329 9.94667 16.2622 10.368C16.4915 10.784 16.6062 11.288 16.6062 11.88C16.6062 12.472 16.4942 12.9787 16.2702 13.4C16.0462 13.816 15.7289 14.1333 15.3182 14.352C14.9129 14.5707 14.4382 14.68 13.8942 14.68H11.9102V9.08ZM13.7902 13.824C14.1742 13.824 14.5049 13.7573 14.7822 13.624C15.0595 13.4853 15.2729 13.272 15.4222 12.984C15.5715 12.696 15.6462 12.328 15.6462 11.88C15.6462 11.2133 15.4835 10.7227 15.1582 10.408C14.8329 10.0933 14.3769 9.936 13.7902 9.936H12.8702V13.824H13.7902Z"
                            fill="#3D4C99" />
                    </svg>

                    {l s='Pokaż w 3D' d='Modules.Webodelivery.Front'}
                </button>
            {/if}
            {if !empty($ar_link)}
                <a data-href="{$ar_link}" class="product-buttons__item btn-white" target="_blank" rel="noopener noreferrer"
                    data-toggle="arlity-card-open-modal">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6.375 9.1875L12 12M6.375 9.1875V14.8125L12 17.625M6.375 9.1875L12 6.375L17.625 9.1875M12 12L17.625 9.1875M12 12V17.625M12 17.625L17.625 14.8125V9.1875M7.5 3H5.25C4.00736 3 3 4.00736 3 5.25V7.5M7.5 21H5.25C4.00736 21 3 19.9927 3 18.75V16.5M16.5 3H18.75C19.9927 3 21 4.00736 21 5.25V7.5M16.5 21H18.75C19.9927 21 21 19.9927 21 18.75V16.5"
                            stroke="#3D4C99" stroke-width="1.125" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    {l s='Pokaż w AR' d='Modules.Webodelivery.Front'}</a>
            {/if}
        </div>

    </div>
{/if}
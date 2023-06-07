<x-layout.dashboard>
    <script src="/assets/js/simple-datatables.js"></script>
    <div id="homepageOptions">
        <h1 class="text-4xl capitalize mb-10 font-bold">home Page Options</h1>
        <div x-data="custom">
            <div class="space-y-6">
                <div class="panel sticky-header">
                    <h5
                        class="md:absolute md:top-[25px] md:mb-0 mb-5  text-lg dark:text-white-light capitalize font-bold">
                        Home Page Texts</h5>
                    <table id="myTable1" class="whitespace-nowrap table-checkbox table-striped table-hover"></table>
                </div>


            </div>
        </div>

    </div>
    @section('extra')
        <div class="modal-overlay fixed inset-0 bg-[black]/60 z-[999] opacity-0 invisible overflow-y-auto duration-300">
            <div class="close-overlay flex items-start justify-center min-h-screen px-4">
                <div class="modal-wrapper panel border-0 p-0 rounded-lg overflow-hidden my-8 w-[800px]">
                    <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                        <div class="font-bold text-lg">Language Text Change</div>

                    </div>
                    <div class="modalContainer p-5 w-auto max-w-[70vw] h-auto max-h-[60vh] overflow-hidden">



                    </div>
                    <div class="p-5 flex justify-between">
                        <button type="button" class="cancelBtn btn btn-outline-danger">Cancel</button>
                        <button type="button" class="saveBtn btn btn-primary ltr:ml-4 rtl:mr-4">Save</button>
                    </div>
                </div>
            </div>


        </div>
    @endsection

    <style>
        table.table-checkbox thead tr th:first-child {
            width: 1px !important;
        }
    </style>

    <script>
        let data_json = {!! json_encode($fields) !!};
        let selectedlang = '{{ $lang }}';

        let rowData = []
        let rowDataContainer = []


        data_json.map((rawDataItem, index) => {
            let dataHTML = `<div class="w-16"></div>`

            rowData.push(rawDataItem.id)
            rowData.push(rawDataItem.section)
            rowData.push(rawDataItem.name)
            rowData.push(
                `<div  class="modalBtn w-64 overflow-hidden">${rawDataItem.data.tr.length >38 ?  rawDataItem.data.tr.substring(0, 38) + "..." : rawDataItem.data.tr}</div>`
            )
            rowData.push(
                `<div  class="modalBtn w-64 overflow-hidden">${rawDataItem.data.en.length >38 ?  rawDataItem.data.en.substring(0, 38) + "..." : rawDataItem.data.en}</div>`
            )
            rowDataContainer.push(rowData)
            rowData = []
        })
        document.addEventListener("alpine:init", () => {
            Alpine.data("custom", () => ({
                ids1: [],
                datatable1: null,
                tableData1: rowDataContainer,
                init() {
                    this.datatable1 = new simpleDatatables.DataTable('#myTable1', {
                        data: {
                            headings: [
                                "ID",
                                "Section", "Name",
                                "Data TR", "Data EN"
                            ],
                            data: this.tableData1
                        },
                        perPage: 20,
                        perPageSelect: [10, 20, 30, 50, 100],

                        firstLast: true,
                        firstText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        lastText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M11 19L17 12L11 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M6.99976 19L12.9998 12L6.99976 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        prevText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        nextText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        labels: {
                            perPage: "{select}"
                        },
                        layout: {
                            top: "{search}",
                            bottom: "{info}{select}{pager}",
                        },
                    });
                },
                formatDate(date) {
                    if (date) {
                        const dt = new Date(date);
                        const month = dt.getMonth() + 1 < 10 ? '0' + (dt.getMonth() + 1) : dt
                            .getMonth() + 1;
                        const day = dt.getDate() < 10 ? '0' + dt.getDate() : dt.getDate();
                        return day + '/' + month + '/' + dt.getFullYear();
                    }
                    return '';
                },
            }));
        });
    </script>
</x-layout.dashboard>
